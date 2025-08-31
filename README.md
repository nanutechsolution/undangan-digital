<p align="center">
  <a href="https://nanutechsolution.com" target="_blank">
    <img src="https://raw.githubusercontent.com/nanutechsolution/undangan-digital/main/logo.png" width="300" alt="NanutechSolution Logo">
  </a>
</p>

<h1 align="center">Undangan Digital - NanutechSolution</h1>

<p align="center">
Digital invitation platform built with Laravel and TailwindCSS, designed to create elegant, responsive, and customizable invitations for weddings, khitanan, aqiqah, and other special events.
</p>

---

## Table of Contents

- [Features](#features)  
- [Technology Stack](#technology-stack)  
- [Installation](#installation)  
- [Usage](#usage)  
- [Demo](#demo)  
- [Admin Panel](#admin-panel)  
- [Contributing](#contributing)  
- [License](#license)  
- [Contact](#contact)  

---

## Features

- **Customizable Templates:** Hundreds of templates to suit any event theme.  
- **RSVP Management:** Track guest attendance online.  
- **Media Gallery:** Upload and display photos and videos.  
- **Countdown Timer:** Keep track of days until the event.  
- **Guest Management:** Add, edit, and remove guests effortlessly.  
- **Export Options:** Generate shareable links, printable invites, and digital cards.  
- **Unlimited Revisions:** Update your invitation anytime with no expiry.  

---

## Technology Stack

- **Backend:** Laravel 10  
- **Frontend:** TailwindCSS, Alpine.js  
- **Database:** MySQL / PostgreSQL / SQLite  
- **Deployment:** Docker-ready / Apache or Nginx  
- **Version Control:** Git  

---

## Installation

Clone the repository:

```bash
git clone https://github.com/nanutechsolution/undangan-digital.git
cd undangan-digital
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
php artisan serve
