import tornado.web
import tuling
import config
import logging
from wechat_sdk.exceptions import ParseError
from wechat_sdk import WechatBasic
from wechat_sdk.messages import (TextMessage, VoiceMessage, ImageMessage, VideoMessage, LinkMessage, LocationMessage, EventMessage, ShortVideoMessage)
# -*- coding: utf-8 -*-
'''
wechatConf = WechatConf(
    token = 'todaycoder',
    appid = 'wxf2da4d91bf3b64f4',
    appsecret = '6a2ccbaaea6e48563c886796749a7a3e',
    encrypt_mode = 'normal' #normal/compatible/safe
)
'''
logging.basicConfig(level=logging.DEBUG)
wechat_conf = config.get_wechat_config()
wechat = WechatBasic(wechat_conf)
tuling_key, tuling_url = config.get_tuling_config()
auto_reply = tuling.TulingAutoReply(tuling_key, tuling_url)

class WX(tornado.web.RequestHandler):
    def get(self):
        signature = self.get_argument('signature', 'default')
        timestamp = self.get_argument('timestamp', 'default')
        nonce = self.get_argument('nonce', 'default')
        echostr = self.get_argument('echostr', 'default')
        if wechat_install.check_signature(signature, timestamp, nonce):
            self.write(echostr)
        else:
            self.write('Not Open')
    def post(self):
        body = self.request.body.decode('utf-8')
        wechat.parse_data(body)
        if isinstance(wechat.message, TextMessage): #Message is text
            content = wechat.message.content
            message = auto_reply.reply(content, wechat.message.source)
            result = wechat.response_text(message['text'])
            self.write(result)
