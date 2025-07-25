# HmacSigner

`HmacSigner` is a lightweight PHP utility class for generating and verifying **HMAC (Hash-based Message Authentication Code)** hashes using customizable hash algorithms and a secret key.

It is ideal for **ensuring data integrity**, **authenticating payloads**, or **signing/verifying tokens** without the need for encryption/decryption.

---

## 📦 Features

- ✅ Generate HMAC hashes using any algorithm supported by PHP’s `hash_hmac()`
- ✅ Secure verification with constant-time comparison (`hash_equals()`)
- ✅ Configurable secret key and hash algorithm
- ✅ Input validation for algorithm safety
- ✅ Simple, self-contained, zero dependencies

---

## ⚙️ How It Works

### 🔐 What is HMAC?

HMAC (Hash-based Message Authentication Code) is a **one-way** cryptographic function that combines a **message** with a **secret key**, and hashes them using a secure algorithm like SHA-256.

It ensures:
- 🔒 **Integrity** - the data wasn't modified
- 🔑 **Authenticity** - the data came from a trusted source

Unlike encryption, **HMAC is not reversible**.

---

## 🚀 Installation

Just include the `HmacSigner.php` class in your project:

```php
require_once 'HmacSigner.php';
