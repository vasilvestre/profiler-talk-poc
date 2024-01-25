# Profiler POC

![CI](https://github.com/vasilvestre/profiler-talk-poc/workflows/CI/badge.svg)

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d --wait` to start the project
3. Run `make build-css` to download the dependencies and build the CSS
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## Usage
Open the project with either symfony server or docker.
Click on "Profile a request".
Use `make webgrind` and open `http://localhost:800` to see the profiling results.

## Features

* Uses [AssetMapper](https://symfony.com/doc/current/frontend/asset_mapper.html#installation)
* Uses [FrankenPHP](https://frankenphp.dev)
* Uses [HTMX](https://htmx.org/)
* Uses SVG loaders from [Sam Herbert's SVG-Loaders](https://github.com/SamHerbert/SVG-Loaders?tab=readme-ov-file)

**Enjoy!**

## Docs

1. [Build options](docs/build.md)
2. [Using Symfony Docker with an existing project](docs/existing-project.md)
3. [Support for extra services](docs/extra-services.md)
4. [Deploying in production](docs/production.md)
5. [Debugging with Xdebug](docs/xdebug.md)
6. [TLS Certificates](docs/tls.md)
7. [Using a Makefile](docs/makefile.md)
8. [Troubleshooting](docs/troubleshooting.md)
9. [Updating the template](docs/updating.md)

## License

Symfony Docker is available under the MIT License.

## Credits

Created by [Kévin Dunglas](https://dunglas.dev), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).
