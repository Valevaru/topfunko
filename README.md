# 🎯 TopFunko - Dynamic PHP E-commerce Website

**TopFunko** is a responsive, database-driven e-commerce web application built with PHP and MySQL. It is designed for showcasing and selling collectible FunkoPop figures, providing users with login/registration capabilities, cart functionality, secure checkout, and user-friendly interaction.

## 📦 Features

- 🛍️ Browse products by category (Star Wars, Marvel, Anime, etc.)
- 🔎 View all products and product details
- 🧾 User registration & login with session management
- 🛒 Cart functionality (add/remove/clear)
- ✅ Checkout form with email and phone validation
- 📬 Order submission and storage in database
- 🛡️ Secure coding practices (prepared statements, input validation)
- 📱 Responsive design with pastel aesthetic

## 🛠️ Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP (vanilla, procedural)
- **Database**: MySQL (via MySQLi)
- **Server**: XAMPP (Apache + MySQL stack)

## 🧾 Folder Structure

funkopopweb/
├── css/               # Custom stylesheets
├── media/             # Product & branding images
├── php/               # Backend PHP scripts (auth, cart, DB, order)
├── index.php          # Main landing page
├── cart.php           # Shopping cart
├── checkout.php       # Checkout process
├── login.php          # User login page
├── register.php       # User registration page
└── dashboard.php      # User dashboard

## 🗃️ Database

The application uses a MySQL database named `funkopop`. It includes:

- `users`: registered user accounts
- `products`: FunkoPop product listings
- `orders`: customer orders
- `order_items`: products linked to each order

Sample SQL file: `funkopop.sql` included for database setup.

## 🔐 Security Measures

- Prepared statements to prevent SQL injection
- Passwords hashed with `password_hash()` and verified using `password_verify()`
- Input validation and sanitization (Latin-only, valid email, strong passwords)
- Session checks for protected pages

## 🧪 Defensive Programming

Implemented during:

- **User registration**: Validates all input fields (email format, password strength, character types). If validation fails, the user is notified with a clear error message and redirected to complete the form again.
- **Checkout process**: Ensures the cart is not empty and validates email and phone number formats before order submission. Invalid input results in immediate error feedback.

## 🚀 Getting Started

1. Clone the repo:
   ```bash
   git clone https://github.com/yourusername/topfunko.git

	2.	Import the database:
	•	Open phpMyAdmin
	•	Create database funkopop
	•	Import funkopop.sql
	3.	Start the server:
	•	Place the funkopopweb/ folder in htdocs
	•	Start Apache & MySQL via XAMPP
	•	Visit http://localhost/funkopopweb

🧠 Author
	•	Charalampos Michailidis
	•	BSc (Hons) Computing (Data Science)

📄 License

This project is licensed under the MIT License. See LICENSE for details.

------------------------------------------------------------------------

# 🎯 TopFunko - Δυναμικό Ηλεκτρονικό Κατάστημα με PHP

Το **TopFunko** είναι ένα δυναμικό και φιλικό προς τον χρήστη e-shop, σχεδιασμένο για την προβολή και πώληση συλλεκτικών φιγούρων FunkoPop. Υλοποιήθηκε με PHP και MySQL, περιλαμβάνει λειτουργίες σύνδεσης/εγγραφής, καλάθι αγορών, υποβολή παραγγελίας και ασφαλή διαχείριση δεδομένων.

## 📦 Λειτουργίες

- 🛍️ Περιήγηση προϊόντων ανά κατηγορία (Star Wars, Marvel, Anime κ.ά.)
- 🔎 Προβολή όλων των προϊόντων και λεπτομερειών
- 🧾 Εγγραφή & σύνδεση χρηστών με χρήση sessions
- 🛒 Καλάθι αγορών (προσθήκη, αφαίρεση, εκκαθάριση)
- ✅ Φόρμα ολοκλήρωσης παραγγελίας με έλεγχο email/τηλεφώνου
- 📬 Καταχώρηση παραγγελίας στη βάση δεδομένων
- 🛡️ Αμυντικός προγραμματισμός και ασφαλής χειρισμός δεδομένων
- 📱 Προσαρμοσμένος σχεδιασμός για κινητές συσκευές

## 🛠️ Τεχνολογίες

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP (χωρίς framework)
- **Βάση Δεδομένων**: MySQL (μέσω MySQLi)
- **Server**: XAMPP (Apache + MySQL)

## 🧾 Δομή Φακέλων

funkopopweb/
├── css/               # Αρχεία εμφάνισης (CSS)
├── media/             # Εικόνες προϊόντων και σελίδων
├── php/               # PHP scripts για βάση, καλάθι, εγγραφή κ.λπ.
├── index.php          # Αρχική σελίδα
├── cart.php           # Καλάθι αγορών
├── checkout.php       # Υποβολή παραγγελίας
├── login.php          # Σελίδα σύνδεσης χρήστη
├── register.php       # Σελίδα εγγραφής χρήστη
└── dashboard.php      # Προσωπικός πίνακας χρήστη

## 🗃️ Βάση Δεδομένων

Η εφαρμογή χρησιμοποιεί βάση `funkopop` με τους εξής πίνακες:

- `users`: εγγεγραμμένοι χρήστες
- `products`: προϊόντα FunkoPop
- `orders`: παραγγελίες
- `order_items`: προϊόντα που σχετίζονται με κάθε παραγγελία

Το αρχείο `funkopop.sql` περιλαμβάνεται για εισαγωγή της βάσης.

## 🔐 Μέτρα Ασφαλείας

- Prepared statements κατά SQL injection
- Κρυπτογράφηση κωδικών με `password_hash()` και `password_verify()`
- Έλεγχος ορθότητας εισόδου (λατινικοί χαρακτήρες, email, password)
- Χρήση sessions για τον έλεγχο πρόσβασης

## 🧪 Αμυντικός Προγραμματισμός

Εφαρμόστηκε κυρίως σε:

- **Εγγραφή χρήστη**: Έλεγχος πεδίων (email, password, λατινικοί χαρακτήρες). Εμφάνιση κατάλληλων μηνυμάτων σε περίπτωση σφάλματος και επαναφορά στη φόρμα.
- **Υποβολή παραγγελίας**: Επιβεβαίωση μη κενής παραγγελίας, έλεγχος format email και τηλεφώνου. Σε περίπτωση σφάλματος, εμφανίζονται ειδοποιήσεις με ακύρωση της υποβολής.

## 🚀 Οδηγίες Χρήσης

1. Κλωνοποίησε το αποθετήριο:
   ```bash
   git clone https://github.com/yourusername/topfunko.git

	2.	Εισαγωγή βάσης δεδομένων:
	•	Άνοιγμα phpMyAdmin
	•	Δημιουργία βάσης funkopop
	•	Εισαγωγή αρχείου funkopop.sql
	3.	Εκκίνηση:
	•	Μεταφορά του φακέλου funkopopweb/ στον φάκελο htdocs
	•	Εκκίνηση Apache & MySQL μέσω XAMPP
	•	Άνοιγμα στο http://localhost/funkopopweb

🧠 Δημιουργός
	•	Χαράλαμπος Μιχαηλίδης
	•	BSc (Hons) Computing (Data Science)
	
📄 Άδεια

Το έργο διανέμεται με άδεια MIT. Δες το αρχείο LICENSE για λεπτομέρειες.


