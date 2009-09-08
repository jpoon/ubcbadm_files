import os
import cgi
import logging
from Member import *
from google.appengine.ext.webapp import template
from google.appengine.ext.webapp.util import run_wsgi_app
from google.appengine.ext import webapp
from google.appengine.api import users

class AllMembersPage(webapp.RequestHandler):
    def get(self):
        sortMethod = self.request.get("sort")

        template_values = {
            'memberList': Member.getMemberList(sortMethod),
            'logoutUrl': users.create_logout_url(self.request.uri)
        }
        path = os.path.join(os.path.dirname(__file__), 'templates', 'memberList.html')
        self.response.out.write(template.render(path, template_values))

class MemberEditPage(webapp.RequestHandler):
    def getInput(self, formId):
        return cgi.escape(self.request.get(formId))

    def get(self):
        emailHash = self.request.get("id")

        template_values = {
            'id': emailHash,
            'member': Member.getMember(emailHash)
        }
        path = os.path.join(os.path.dirname(__file__), 'templates', 'memberEdit.html')
        self.response.out.write(template.render(path, template_values))

    def post(self):
        emailHash = self.request.get("id")
        member = Member.getMember(emailHash)

        firstName = self.getInput('firstName')
        lastName = self.getInput('lastName')
        email = self.getInput('email')

        if member.firstName != firstName:



application = webapp.WSGIApplication(   [('/admin/memberList', AllMembersPage),
                                         ('/admin/memberEdit', MemberEditPage)],
                                        debug=True)

def main():
    run_wsgi_app(application)

if __name__ == "__main__":
    main()
