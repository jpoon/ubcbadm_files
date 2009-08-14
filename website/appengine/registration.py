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
        skillLevels = []
        skillLevels.append("Beginner")
        skillLevels.append("Intermediate I")
        skillLevels.append("Intermediate II")
        skillLevels.append("Advanced")

        formFieldList = []
        formFieldList.append(FormField("First Name", "firstName", RegisterPage.getNext(it), "text", ""))
        formFieldList.append(FormField("Last Name", "lastName", RegisterPage.getNext(it), "text", ""))
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
        studentNo = int(self.getInput('studentNo'))
        phoneNumber = db.PhoneNumber(self.getInput('phoneNumber'))
        email = db.Email(self.getInput('email'))
        level = self.getInput('level')

        formData = []
        formData.append(firstName)
        formData.append(lastName)
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
            self.response.out.write(Member.nextAvailableMemberNo())
            member = Member(firstName = firstName,
                            lastName = lastName,
                            studentNo = studentNo,
                            phoneNumber = phoneNumber,
                            email = email,
                            level = level,
                            memberNo = Member.nextAvailableMemberNo())
            member.Save()
            self.redirect("/registerDone?key=" + str(member.key()))

class DonePage(webapp.RequestHandler):
    def get(self):
        key_name = self.request.get("key")

        key = db.Key(key_name)
        member = db.get(key)

        email = SendMail(users.get_current_user().email(),
                         member.email, 
                         'Registration', 
                         "test")
        email.send()
 
        template_values = {
            'member': member,
            'backUrl': '/register'
        }
       
        path = os.path.join(os.path.dirname(__file__), 'templates', 'done.html')
        self.response.out.write(template.render(path, template_values)) 

application = webapp.WSGIApplication(   [('/register', RegisterPage),
                                         ('/registerDone', DonePage)],
                                        debug=True)

def main():
    run_wsgi_app(application)

if __name__ == "__main__":
    main()
