const request = require('request')

request({
  method: 'POST',
  uri: 'https://notify-api.line.me/api/notify',
  header: {
    'Content-Type': 'application/x-www-form-urlencoded',
  },
  auth: {
    bearer: 'x1Y04k8ZeX5oQJ9zsXEgJPKhC6IqJuGC6Ystw2Y19eX', //token
  },
  form: {
    message: 'ทดสอบ', //ข้อความที่จะส่ง
  },
}, (err, httpResponse, body) => {
  if (err) {
    console.log(err)
  } else {
    console.log(body)
  }
})
