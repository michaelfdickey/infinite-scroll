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
