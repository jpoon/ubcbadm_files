import os
import cgi
import logging
import itertools 
from SendMail import *
from Member import *
from google.appengine.ext.webapp import template
from google.appengine.ext.webapp.util import run_wsgi_app
from google.appengine.ext import webapp
from google.appengine.api import users

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

        # building form
        formFieldList = []
        formFieldList.append(FormField("First Name", "firstName", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Last Name", "lastName", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("UBC Affliation", "ubcAffliation", RegisterPage.getNext(it), "radio", types))
        formFieldList.append(FormField("Student No", "studentNo", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Phone Number", "phoneNumber", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Email", "email", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Skill Level", "level", RegisterPage.getNext(it), "radio", skillLevels)) 
        
        template_values = {
            'messageList': messageList,
            'formFieldList': formFieldList,
            'logoutUrl': users.create_logout_url(self.request.uri)
        }
        return template_values

    def get(self):
        template_values = self.getFormTemplate('', '')
        path = os.path.join(os.path.dirname(__file__), 'templates', 'form.html')
        self.response.out.write(template.render(path, template_values))

    def post(self):
        firstName = self.getInput('firstName')
        lastName = self.getInput('lastName')
        ubcAffliation = self.getInput('ubcAffliation')
        studentNo = self.getInput('studentNo')
        phoneNumber = db.PhoneNumber(self.getInput('phoneNumber'))
        email = db.Email(self.getInput('email'))
        level = self.getInput('level')

        # must be appended in same order as form
        formData = []
        formData.append(firstName)
        formData.append(lastName)
        formData.append(ubcAffliation)
        formData.append(studentNo)
        formData.append(phoneNumber)
        formData.append(email)
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
            template_values = self.getFormTemplate(formData, message)
            path = os.path.join(os.path.dirname(__file__), 'templates', 'form.html')
            self.response.out.write(template.render(path, template_values))
        else:
            member = Member(firstName = firstName,
                            lastName = lastName,
                            ubcAffliation = ubcAffliation,
                            phoneNumber = phoneNumber,
                            email = email,
                            level = level,
                            memberNo = Member.nextAvailableMemberNo())

            if ubcAffliation == 'Student':
                member.studentNo = int(studentNo)

            member.Create()
            self.redirect("/register/done?key=" + str(member.key()))

class DonePage(webapp.RequestHandler):
    def get(self):
        key_name = self.request.get("key")

        try:
            key = db.Key(key_name)
            member = db.get(key)

            msgBody =   member.firstName + ', \n\n' \
                        'Welcome to the UBC Badminton Club! ' \
                        'In order to verify your email, please click the following link: ' \
                        + member.getActivateUrl(self)

            email = SendMail(users.get_current_user().email(),
                            member.email, 
                            'Registration',
                            msgBody)
            email.send()
 
            template_values = {
                'member': member,
                'backUrl': '/register'
            }
       
            path = os.path.join(os.path.dirname(__file__), 'templates', 'done.html')
            self.response.out.write(template.render(path, template_values)) 

        except:
            logging.warn('Error retreiving member with key %s' % key_name)

            template_values = {
                'content' : "404 - unable to retrive member with that particular key id",
                'ContactEmail' : 'ubc.badm@gmail.com'
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
        else:
            pageContent =  'Uh oh! Spagetti-O! <br/>' \
                           'We are not able to verify this email address. Contact us for further support.'

        template_values = {
            'content': pageContent,
            'ContactEmail': 'ubc.badm@gmail.com'
        }

        path = os.path.join(os.path.dirname(__file__), 'templates', 'basic.html')
        self.response.out.write(template.render(path, template_values))

application = webapp.WSGIApplication(   [('/register', RegisterPage),
                                         ('/register/done', DonePage),
                                         ('/register/activate', ActivationPage)],
                                        debug=True)

def main():
    run_wsgi_app(application)

if __name__ == "__main__":
    main()
