import json
import requests
class TulingAutoReply:
    def __init__(self, tuling_key, tuling_url):
        self.key = tuling_key
        self.url = tuling_url

    def reply(self, content, userid):
        body = {'key': self.key, 'info': content.encode('utf-8'), 'userid': userid}
        r = requests.post(self.url, body)
        result = r.text
        return json.loads(result)

