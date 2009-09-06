import hashlib
import logging
from google.appengine.ext import db

class Member(db.Model):
    createDate = db.DateTimeProperty(auto_now_add=True)
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

    def Create(self):
        hash = hashlib.md5()
        hash.update(self.email)
        self.emailHash = hash.hexdigest()
        self.emailVerified = False
        self.put()
        logging.info('Creating member with id %i' % self.memberNo)

    def getActivateUrl(self, handler):
        return handler.request.host_url + '/register/activate?verify=' + self.emailHash

    @staticmethod
    def verifyEmail(hash):
        query = Member.gql("WHERE emailHash= :hash", hash=hash)
        if query.count() == 1:
            member = query.get()
            member.emailVerified = True
            member.put()
            return member
        else:
            logging.info('Unable to verify hash %s' % hash)
            return None

    @staticmethod
    def getMemberList(sortMethod):
        memberList = Member.all()

        try:
            memberList.order(sortMethod)
        except:
            memberList.order('memberNo')

        return memberList

    @staticmethod
    def nextAvailableMemberNo():
        memberList = Member.getMemberList('memberNo')
    
        prevMemberNo = 0
        for member in memberList:
            memberNo = member.memberNo
            if memberNo == (prevMemberNo + 1):
                prevMemberNo = memberNo
            else:
                break

        return prevMemberNo + 1

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
