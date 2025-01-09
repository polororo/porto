import json
import smtplib, ssl
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

with open("data.json", "r") as file:
    data = json.load(file)
    print("Données reçues :", data)

msg = data['message']
email = data['email']
sujet = data['sujet']

smtp_address = 'smtp.gmail.com'
smtp_port = 465

email_address = 'loannordvpn@gmail.com'
email_password = 'donk rzga frnu qmck'
email_receiver = 'cbenoit@guardiaschool.fr'

message = MIMEMultipart('alternative')
message['Subject'] = sujet
message['From'] = email_address
message['To'] = email_receiver

texte = msg
html = f"""
<html>
  <body>
    <p>{msg}</p>
  </body>
</html>
"""

texte_mime = MIMEText(texte, 'plain')
html_mime = MIMEText(html, 'html')
message.attach(texte_mime)
message.attach(html_mime)

context = ssl.create_default_context()
with smtplib.SMTP_SSL(smtp_address, smtp_port, context=context) as server:
    server.login(email_address, email_password)
    server.sendmail(email_address, email_receiver, message.as_string())