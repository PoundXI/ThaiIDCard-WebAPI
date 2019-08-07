# ThaiIDCard-WebAPI
A Simple Web API for Generating & Verifying Thai IDCard Numbers.

## Objectives
- For verifying Thai IDCard numbers (Only verify with check digit).
- For random generating Thai IDCard numbers with valid check digit & doesn't exits in the real world.

## Usage
### Starting Web Server
```shell
$ php -S localhost:8000 -t PATH_TO_THIS_PROJECT
```

### API Usage
- URL for Generating IDCard "[http://localhost:8000/?command=generate](http://localhost:8000?command=generate)"
- URL for Verifying IDCard "[http://localhost:8000/?command=verify&idcard=idcard_number](http://localhost:8000?command=verify&idcard=idcard_number)"

#### Open an example HTML page
- Open this url "[http://localhost:8000/example.html](http://localhost:8000/example.html)" via the Web Browser.
- Or just open example.html file via the Web Browser.

## Resources
- [https://th.wikipedia.org/wiki/เลขประจำตัวประชาชนไทย](https://th.wikipedia.org/wiki/เลขประจำตัวประชาชนไทย)
