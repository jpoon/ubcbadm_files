import os
import cgi
import logging
import itertools 
import hashlib
from SendMail import *
from Member import *
from Template import *
from datetime import datetime
from google.appengine.ext.webapp import template
from google.appengine.ext.webapp.util import run_wsgi_app
from google.appengine.ext import webapp
from google.appengine.api import users
from google.appengine.api import memcache

class FormField(object):
    def __init__(self, label, inputName, value, formType, formOptions):
        self.formLabel = label
        self.formInputName = inputName
        self.formValue = value
        self.formType = formType
        self.formOptions = formOptions
     
class RegisterPage(webapp.RequestHandler):
    @staticmethod
    def getNext(iterable):
        try:
            value =  iterable.next()
        except StopIteration:
            value = '' 

        return value

    def getInput(self, formId):
        # obtains object value from form and escapes it
        return cgi.escape(self.request.get(formId))
    
    def getFormTemplate(self, formData, messageList):
        it = iter(formData)

        # radio button values
        types = []
        types.append("Student")
        types.append("Faculty")
        types.append("Other")

        skillLevels = []
        skillLevels.append("Beginner")
        skillLevels.append("Intermediate I")
        skillLevels.append("Intermediate II")
        skillLevels.append("Advanced")

        memberTypes = []
        memberTypes.append("New")
        memberTypes.append("Returning")

        # building form
        formFieldList = []
        formFieldList.append(FormField("First Name", "firstName", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Last Name", "lastName", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("UBC Affliation", "ubcAffliation", RegisterPage.getNext(it), "radio", types))
        formFieldList.append(FormField("Student No", "studentNo", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Phone Number", "phoneNumber", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Email", "email", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Member Type", "memberType", RegisterPage.getNext(it), "radio", memberTypes))
        formFieldList.append(FormField("Skill Level", "level", RegisterPage.getNext(it), "radio", skillLevels)) 

        urlList = []
        urlList.append(Url("Logout", users.create_logout_url(self.request.uri)))
        
        template_values = {
            'messageList': messageList,
            'formFieldList': formFieldList,
            'urlList': urlList
        }
        return template_values

    def get(self):
        if Member.isFull():
            pageContent = "Oh Noes! Membership is full! " \
                          "Due to limited gym space, we are only able to accept a limited amount of members. " \
                          "<p>You can place your name and contact information on the waitlist in the scenario that room in the club is available.</p>"
 
            template_values = {
                'content' : pageContent
            }
       
            path = os.path.join(os.path.dirname(__file__), 'templates', 'basic.html')
            self.response.out.write(template.render(path, template_values))
        else:
            template_values = self.getFormTemplate('', '')
            path = os.path.join(os.path.dirname(__file__), 'templates', 'registerForm.html')
            self.response.out.write(template.render(path, template_values))

    def post(self):
        firstName = self.getInput('firstName')
        lastName = self.getInput('lastName')
        ubcAffliation = self.getInput('ubcAffliation')
        studentNo = self.getInput('studentNo')
        phoneNumber = db.PhoneNumber(self.getInput('phoneNumber'))
        email = db.Email(self.getInput('email'))
        memberType = self.getInput('memberType')
        level = self.getInput('level')

        # must be appended in same order as form
        formData = []
        formData.append(firstName)
        formData.append(lastName)
        formData.append(ubcAffliation)
        formData.append(studentNo)
        formData.append(phoneNumber)
        formData.append(email)
        formData.append(memberType)
        formData.append(level)

        error = False       
        message = [] 

        # Check email address
        if Member.isValidEmail(email) is False:
            message.append("Email is already in use by another member")
            error = True
        
        # Check for duplicate student number
        if Member.isValidStudentNo(studentNo) is False:
            message.append("Student Number already registered")
            error = True
        
        if error is True:
            # re-post page with previously inputted information
            template_values = self.getFormTemplate(formData, message)
            path = os.path.join(os.path.dirname(__file__), 'templates', 'registerForm.html')
            self.response.out.write(template.render(path, template_values))
        else:
            # otherwise, memcache Member object
            member = Member(firstName = firstName,
                            lastName = lastName,
                            ubcAffliation = ubcAffliation,
                            phoneNumber = phoneNumber,
                            email = email,
                            memberType = memberType,
                            level = level,
                            memberNo = Member.nextAvailableMemberNo())

            if ubcAffliation == 'Student':
                member.studentNo = int(studentNo)

            key = str(datetime.now()) + str(member.email)
            hash = hashlib.md5()
            hash.update(key)
            hex = hash.hexdigest()
            
            memcache.add(hex, member, 300)
            logging.info('Memcache - Adding entry with key %s ' % hex)
            self.redirect("/register/confirm?id="+hex)

class ConfirmPage(webapp.RequestHandler):
    def get(self):
        key = self.request.get("id")        
        member = memcache.get(key)

        if member is None:
            # obtain Member object from memcache, if missing redirect to registration form
            logging.warn("Memcache - Miss")
            self.redirect("/register")
        else:
            urlList = []
            urlList.append(Url('Back', '/register'))

            template_values = {
                'key': key,
                'memberType': member.memberType,
                'urlList': urlList
            }
       
            path = os.path.join(os.path.dirname(__file__), 'templates', 'registerConfirm.html')
            self.response.out.write(template.render(path, template_values)) 

    def post(self):
        key = self.request.get("id")
        member = memcache.get(key)

        if member is None:
            logging.warn("Memcache - Miss")
            self.redirect("/register")
        else:
            # Create the member and delete cached object
            member.Create()
            memcache.delete(key)
            logging.info('Memcache - Remove item with key %s ' % key)
            self.redirect("/register/done?key=" + str(member.key()))
        
class DonePage(webapp.RequestHandler):
    def get(self):
        key_name = self.request.get("key")

        try:
            key = db.Key(key_name)
            member = db.get(key)

            msgBody =   member.firstName + ', \n\n' \
                        'Welcome to the UBC Badminton Club! ' \
                        'For Term 1, gym nights will be Tuesday from 4-6pm and Fridays from 6:30-11pm. ' \
                        'The first gym night (Tuesday, Sept. 29) will be an orientation to new members and will therefore be open to NEW members only. '\
                        'For all other members, Friday, Oct. 2, will be the first gym night open to all members (both returning and new). ' \
                        'Be sure to check us out on our website for further details. \n\n' \
                        'In order to receive further UBC Badminton Club emails, please verify your email by clicking the following link: ' \
                        + member.getActivateUrl(self) 

            email = SendMail(users.get_current_user().email(),
                            member.email, 
                            'Registration',
                            msgBody)
            email.send()

            pageContent = '<p>' + member.firstName + ',</p>' \
                          '<p>Congratulations on becoming a member of the UBC Badminton Club!</p>' \
                          '<p>Tuesday, Sept. 29th will be an orientation for <b>new</b> members. ' \
                          'Friday, Oct. 2nd will be the first gym night open to all members (new and returning).</p>' \
                          '<p>Be sure to check your inbox for further UBC Badminton news!</p> ' 

            urlList = []
            urlList.append(Url('Back', '/register'))
 
            template_values = {
                'content' : pageContent,
                'urlList' : urlList
            }
       
            path = os.path.join(os.path.dirname(__file__), 'templates', 'basic.html')
            self.response.out.write(template.render(path, template_values)) 

        except:
            logging.warn('Error retreiving member with key %s' % key_name)

            template_values = {
                'content' : "404 - Uh Oh! We weren't able to retreive the member with that particular id. Please talk to your nearest executive for HeLp!" ,
            }

            path = os.path.join(os.path.dirname(__file__), 'templates', 'basic.html')
            self.response.out.write(template.render(path, template_values))

class ActivationPage(webapp.RequestHandler):
    def get(self):
        hash = self.request.get("verify")

        member = Member.verifyEmail(hash)

        if member != None:
            pageContent =  member.firstName + ', <br/><br/>' \
                           'Thank you for verifying your email address. ' \
                           'Be sure to check your inbox frequently for UBC Badminton Club news!'
            logging.info('Member - %s verified' % member.email)

        else:
            pageContent =  'Uh oh! Spagetti-O! <br/>' \
                           'We are not able to verify this email address. Contact us for further support.'

        template_values = {
            'content': pageContent,
        }

        path = os.path.join(os.path.dirname(__file__), 'templates', 'basic.html')
        self.response.out.write(template.render(path, template_values))

application = webapp.WSGIApplication(   [('/register', RegisterPage),
                                         ('/register/confirm', ConfirmPage),
                                         ('/register/done', DonePage),
                                         ('/register/activate', ActivationPage)],
                                        debug=True)

def main():
    run_wsgi_app(application)

if __name__ == "__main__":
    main()
