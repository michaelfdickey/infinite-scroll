# infinite-scroll
an infinite scroll app for apache web server

## Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/michaelfdickey/infinite-scroll.git
   cd infinite-scroll
   ```

2. Install dependencies:
   ```
   npm install
   ```

3. Start the Apache server and ensure it is running.

4. Open the `index.html` file in your browser to view the web app.

## Configuration

1. Ensure the `generate_thumbnails.php` script is executable and accessible by the Apache server.

2. Configure the image directory path in the `generate_thumbnails.php` script if necessary.

## Usage

1. The web app will display images in a responsive grid layout.

2. As you scroll down, more images will be loaded dynamically.

3. Click on any image to view it in full size.

## Dependencies

- Apache web server
- Node.js and npm
- PHP

## Windows-Specific Setup Instructions

1. Ensure you have Apache installed on your Windows system. You can download it from the [Apache Lounge](https://www.apachelounge.com/download/).

2. Install PHP for Windows. You can download it from the [PHP for Windows](https://windows.php.net/download/) website.

3. Configure Apache to work with PHP by adding the following lines to your `httpd.conf` file:
   ```
   LoadModule php_module "C:/path/to/php/php7apache2_4.dll"
   AddHandler application/x-httpd-php .php
   PHPIniDir "C:/path/to/php"
   ```

4. Ensure the `generate_thumbnails.php` script is executable on Windows. You can do this by right-clicking the file, selecting "Properties", and ensuring the "Read-only" attribute is unchecked.

5. Update the image directory path in the `generate_thumbnails.php` script to use Windows-specific paths, e.g., `C:\\path\\to\\your\\images\\directory`.

6. Restart Apache to apply the changes.

## Windows-Specific Configuration

1. Ensure the `generate_thumbnails.php` script is executable and accessible by the Apache server.

2. Configure the image directory path in the `generate_thumbnails.php` script to use Windows-specific paths, e.g., `C:\\path\\to\\your\\images\\directory`.
