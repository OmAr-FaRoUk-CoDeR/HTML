const express = require('express');
const bodyParser = require('body-parser');
const fetch = require('node-fetch');

const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

app.post('/submit', async (req, res) => {
    const { full_name, full_location, phone_number, quantity } = req.body;

    const message = `
        اسم المنتج: اسم المنتج
        الاسم الكامل: ${full_name}
        العنوان: ${full_location}
        رقم الهاتف: ${phone_number}
        عدد القطع: ${quantity}
    `;

    const botToken = '5965678266:AAGpML5E_oS53VsSULpBgYRuMr9Mtkpp1ow'; // استبدله بتوكن بوتك
    const chatId = '6217513559'; // استبدله بمعرف دردشتك
    const url = `https://api.telegram.org/bot${botToken}/sendMessage`;

    const data = new URLSearchParams();
    data.append('chat_id', chatId);
    data.append('text', message);

    try {
        const response = await fetch(url, {
            method: 'POST',
            body: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        });

        if (response.ok) {
            console.log('Message sent to Telegram bot successfully');
            res.send('Data sent to Telegram bot successfully');
        } else {
            console.error('Failed to send message to Telegram bot');
            res.status(500).send('Failed to send data to Telegram bot');
        }
    } catch (error) {
        console.error('Error sending data to Telegram bot:', error);
        res.status(500).send('Error sending data to Telegram bot');
    }
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
