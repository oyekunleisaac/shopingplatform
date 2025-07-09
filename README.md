# AI-Powered Shopping Companion – Technical & Functional Documentation

This document provides a clear, easy-to-understand explanation of how the AI-Powered Shopping Companion works. It is written for both technical and non-technical readers and includes information about how the system operates, what it does, and how to use it.



## Overview

The AI-Powered Shopping Companion is a digital assistant designed to help users browse, select, and purchase products like snacks and drinks. It uses a backend server built with Laravel (PHP framework) and a mobile app frontend built with Flutter (cross-platform framework).



## 1. Functional Summary

* **User Registration & Login**: New users can register, and existing users can log in securely.
* **Product Browsing**: Users can view a list of available snacks and drinks.
* **Smart Suggestions**: When users view a product, the system suggests related items.
* **Cart Management**: Users can add items to their cart.
* **Checkout**: Users can finalize their shopping and place an order.



## 2. System Components

### Backend (Laravel)

* **Purpose**: Acts as the brain of the system, handling data, logic, and communication.
* **Key Features**:

  * Stores product details (name, image, price, category).
  * Manages user data and authentication.
  * Handles carts and orders.
  * Provides suggestions based on categories (like “Snacks” or “Drinks”).

### Frontend (Flutter Mobile App)

* **Purpose**: User-facing interface, allowing customers to interact with the system on their phone.
* **Key Screens**:

  * Login/Register
  * Product Grid
  * Cart
  * Suggestions Widget



## 3. Main Processes

### A. User Onboarding

* **Register**: User provides email and password to create an account.
* **Login**: User logs in with their credentials. The app receives a secure token to keep the session active.

### B. Viewing Products

* The app fetches a list of available products (e.g. Oreo, Coke).
* Each product has a name, image, price, and category.

### C. Smart Suggestions

* When a user views a product category (like "Snacks"), the app shows similar items (e.g. Chips, Biscuits).

### D. Cart and Checkout

* Users add products to their cart.
* When ready, they proceed to checkout.
* The order is saved, and the cart is cleared.



## 4. API Summary (For Integration & Testing)

These are the endpoints used by the mobile app to communicate with the backend. These require authentication (user must be logged in), unless noted.

### A. Public APIs

* **Register**

  * Endpoint: `POST /api/register`
  * Payload:

    ```json
    {
      "name": "John Doe",
      "email": "john@example.com",
      "password": "password"
    }
    ```

* **Login**

  * Endpoint: `POST /api/login`
  * Payload:

    ```json
    {
      "email": "john@example.com",
      "password": "password"
    }
    ```

### B. Authenticated APIs

* **Get All Products**

  * Endpoint: `GET /api/products`

* **Add to Cart**

  * Endpoint: `POST /api/cart`
  * Payload:

    ```json
    {
      "product_id": 1,
      "quantity": 2
    }
    ```

* **Checkout**

  * Endpoint: `POST /api/checkout`

* **Get Suggestions**

  * Endpoint: `GET /api/suggestions/{category}`
  * Example: `/api/suggestions/Snacks`



## 5. Who is This For?

This system is ideal for:

* Grocery and convenience store owners who want a mobile ordering system.
* Developers seeking a base project for learning Laravel + Flutter integration.
* Product teams creating AI-based e-commerce apps.



## 6. Glossary (Non-Technical)

* **Backend**: The behind-the-scenes part of the app that stores and processes data.
* **Frontend**: What users see and interact with (buttons, product lists, etc.).
* **Cart**: A digital basket where users place items before buying.
* **Checkout**: The final step where users confirm and pay for their order.
* **API**: A way for different software (like the app and server) to talk to each other.
* **Token**: A digital key that keeps users logged in securely.
