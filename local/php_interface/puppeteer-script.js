const puppeteer = require('puppeteer');
const fs = require('fs');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    const query = process.argv[2];
    const url = `https://lenta.ru/search?q=${encodeURIComponent(query)}`;

    await page.goto(url, { waitUntil: 'networkidle2' });
    const content = await page.content();

    // Запись результата в файл
    fs.writeFileSync('output.html', content);
    console.log(content);
    await browser.close();
    process.exit(0);
})();