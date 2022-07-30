# Laravel Image Uploader

## Description
Simple laravel image uploader without additional dependencies.

## Getting Started
- Clone this repository
- Install dependencies using `composer install`
- Create symbolic link using `php artisan storage:link`
- Run `php artisan serve`
- Upload route URL is `http://localhost:8000/api/upload`

## Example Upload Response JSON
```
{
    "picture": {
        "name": "Jokowi_19_ant__1659159205.jpg",
        "size": 82789,
        "mime": "image/jpeg",
        "url": "http://localhost:8000/storage/Jokowi_19_ant__1659159205.jpg"
    }
}
```

## Features
- Upload images to the server
- Input validation
- Image renaming
- Error handling API Response

## TODO
- Add image resizing
- Add image cropping
- Add image watermarking
- Add image compression
