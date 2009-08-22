import hashlib
from google.appengine.ext import db

class Member(db.Model):
    lastModDate = db.DateTimeProperty(auto_now_add=True)
    firstName = db.StringProperty(required=True)
    lastName = db.StringProperty(required=True)
    ubcAffliation = db.StringProperty(required=True, choices=set(["Student", "Faculty", "Other"]))
    studentNo = db.IntegerProperty()
    phoneNumber = db.PhoneNumberProperty(required=True)
    email = db.EmailProperty(required=True)
    level = db.StringProperty(required=True, choices=set(["Beginner", "Intermediate I", "Intermediate II", "Advanced"]))
    memberNo = db.IntegerProperty(required=True)
    emailHash = db.StringProperty()
    emailVerified = db.BooleanProperty()

    def Save(self):
        hash = hashlib.sha512()
        hash.update(self.email)
        self.emailHash = hash.hexdigest()
        self.put()

    @staticmethod
    def nextAvailableMemberNo():
        q = Member.all()
        q.order('-memberNo')
        top = q.get()
        try:
            return top.memberNo + 1
        except:
            return 1

    @staticmethod
    def isValidEmail(email):
        query = Member.gql("WHERE email= :email", email=email)
        if query.count() > 0:
            return False
        else:
            return True

    @staticmethod
    def isValidStudentNo(number):
        query = Member.gql("WHERE studentNo= :number", number=number)
        if query.count() > 0:
            return False
        else:
            return True
