import os
import cgi
import logging

from Member import *
from google.appengine.ext.webapp import template
from google.appengine.ext.webapp.util import run_wsgi_app
from google.appengine.ext import webapp
from google.appengine.api import users

class VerificationPage(webapp.RequestHandler):
    def get(self):

    def post(self):

application = webapp.WSGIApplication(   [('/emailVerification', VerificationPage)],
                                        debug=True)

def main():
    run_wsgi_app(application)

if __name__ == "__main__":
    main()
