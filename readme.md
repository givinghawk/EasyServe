# EasyServe

EasyServe is a lightweight web server designed to simplify the process of serving HTML pages without requiring the use of the .html or .md extension. It also includes built-in HTML validation and upcoming support for Markdown, making it easy for users to create and serve content without the need for in-depth HTML knowledge.

## Features

- Serve HTML pages without the .html extension.
- Built-in HTML validation to ensure compliance with standards.
- Markdown support for easy content creation.
- Simple configuration file for customizing settings.
- Lightweight and easy to use.
- Codeblock support in Markdown.

## Getting Started

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/givinghawk/EasyServe.git
    ```

2. Move the files out of the project directory (web servers only):

    ```bash
    mv ./EasyServe/* ./
    ```

3. Configure the project by copying `config.example.php` to `config.php` and modifying the settings as needed.

## Usage

1. Navigate to the project directory:
    ```bash
    cd EasyServe
    ```

2. Run the server:
    ```bash
    php -S localhost:80
    ```

3. Please note that that you will need to make an index file (either index.html or index.md) in the directory you have configured to serve files from.

4. Open your web browser and navigate to `http://localhost` to view the index page.

Alternativley you can add the files to your web server's root directory and navigate to `http://localhost` to view the index page.

## Configuration
EasyServe comes with a simple configuration file (config.php) where you can customize settings such as port number and file extensions. You can find the default configuration file in the root directory of the project. Information on the configuration options can be found in the [project wiki](https://github.com/givinghawk/EasyServe/wiki/Configuration).

## Contributing
Contributions are welcome! Please read our [contributing guidelines](CONTRIBUTING.md) to get started.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgements
- [Tailwind CSS (CSS for error pages)](https://tailwindcss.com/)
- [Bootstrap (CSS for Markdown boilerplate)](https://getbootstrap.com/)
- [Parsedown (Markdown parser)](https://parsedown.org/)

## Support
For support, please [open an issue](https://github.com/givinghawk/EasyServe/issues).