# Reproducer sulu/sulu#6905

## Installation

```bash
git clone git@github.com:nikomuse/sulu-skeleton-extranet.git
cd sulu-skeleton-extranet
```

Start services:

```bash
docker compose up

symfony serve
```

Install dependencies:

```bash
composer install
```

Install fixtures:

```bash
bin/console sulu:build dev
```

## Reproducing

Open [http://127.0.0.1:8000/admin/](http://127.0.0.1:8000/admin/) and login with `admin` / `admin` and visit the homepage preview.
