import logging
from google.appengine.api import mail

class SendMail:
    def __init__(self, fromEmail, toEmail, subject, body):
        logging.info('Creating email to %s' % toEmail)

        self.msg = mail.EmailMessage()
        self.msg.sender = fromEmail 
        self.msg.subject = '[UBC Badm] ' + subject
        self.msg.to = toEmail
        self.msg.body = body

    def send(self):
        try:
            self.msg.check_initialized()
            self.msg.send()
        except InvalidEmailError:
            logging.error('Invalid email address: (recipient %s) (sender %s)' % toEmail  % sender)
        except MissingRecipientsError:
            logging.error('Missing email recipients')
        except MissingSubjectError:
            logging.error('Missing email subject')
        except MissingBodyError:
            logging.error('Missing body')
        except:
            logging.error('Error sending mail')
            
        
