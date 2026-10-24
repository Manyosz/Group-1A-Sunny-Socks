# ☀️ Sunny Socks

Sunny Socks is a sock shop website created by Group 1A as part of a university project. The assignment is to build a website together and practise web development, version control, and teamwork.

## About the website

The website presents a colourful sock brand, with a homepage, a collection page, a planned order page, and customer information pages. It is an educational project under development.

The project includes:

- A homepage with product categories, bestsellers, and the brand story.
- A shop collection interface with category filters, sorting controls, and a product details dialog.
- A planned order page where visitors can enter their details and place an order as part of the website demonstration.
- Customer information pages for frequently asked questions, shipping, returns, and sizing.
- Shared PHP header and footer files for reuse across pages.

## Technologies

- **HTML** — page structure and content.
- **CSS** — styling and layout.
- **JavaScript** — interactive shop features.
- **PHP** — shared page components.
- **Docker Compose** — a local development server using PHP 8.4 and Apache.
- **Git and GitHub** — version control, branches, and pull requests.

## Run locally

### Requirements

Install Git and Docker Desktop (or Docker with Docker Compose). Make sure Docker is running before starting the website.

### Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/Manyosz/Group-1A-Sunny-Socks.git
   cd Group-1A-Sunny-Socks
   ```

2. Start the local server:

   ```bash
   docker compose up -d
   ```

3. Open [http://localhost:8081](http://localhost:8081) in your browser.

The project folder is mounted into the container, so you can edit the files and refresh the browser to see your changes. Use the local server when viewing PHP pages so the shared header and footer can load.

To stop the server:

```bash
docker compose down
```

## Project structure

| File | Purpose |
| --- | --- |
| `index.php` | Homepage |
| `Shop-page-collections.html` | Shop collection page |
| `style.css` | Website styling |
| `header.php` | Shared navigation and header |
| `footer.php` | Shared footer |
| `FAQ.php` | Frequently asked questions |
| `Shipping.php` | Shipping information |
| `Returns.php` | Returns information |
| `SizingGuide.php` | Sock sizing guide |
| `compose.yaml` | Local PHP and Apache server configuration |
| `CONTRIBUTING.md` | Team Git workflow and review guidelines |

## Team

Created by Group 1A:

- [Manyosz](https://github.com/Manyosz)
- [VladimirKritsak](https://github.com/VladimirKritsak)
- [CoderQ178](https://github.com/CoderQ178)
- [kaylencnm](https://github.com/kaylencnm)
- [crimi1](https://github.com/crimi1)

## Contributing

Team members should create a branch for each task and open a pull request into `main`. Read [CONTRIBUTING.md](CONTRIBUTING.md) for setup instructions, code review guidelines, and help with merge conflicts.

## Project status

Work in progress for a university assignment. Some links and shop interactions may still be incomplete. Product information and promotional content are part of the website demonstration.
