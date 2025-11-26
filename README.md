 **Projet Web PHP – Gestion de Personnages (TP Base de Données & Application Web)**

Ce projet est une application web développée en PHP permettant de gérer des personnages (CRUD complet) ainsi que leurs attributs : **Élément**, **Origine** et **Classe**.

Il a été réalisé dans le cadre du TP *Base de Données & App Web* afin de mettre en pratique :
✔ Manipulation de bases de données
✔ Architecture MVC simple
✔ Moteur de templates (Plates)
✔ CRUD complet
✔ Authentification basique

---

## **1. Prérequis**

Avant d’exécuter le projet, il faut disposer de :

* PHP 8+
* Composer
* WAMP 
* MySQL
* Un navigateur moderne (Chrome, Firefox…)

---

## **2. Installation du projet**

### **2.1 – Cloner le projet**

```bash
git clone https://github.com/Hadjer-2023/Projet
cd Projet
```

### **2.2 – Placer le projet dans le serveur local**

**WAMP :**

```
C:\wamp64\www\Projet
```

**XAMPP :**

```
htdocs/Projet
```

---

## **3. Installation des dépendances**

Le projet utilise le moteur de template **Plates**.

Dans un terminal :

```bash
composer install
```

---

## **4. Configuration de la base de données**

### **Créer la base :**

```sql
CREATE DATABASE genshin_db;
USE genshin_db;
```

---

## **4.1 – Tables nécessaires**

### **Table PERSONNAGE**

```sql
CREATE TABLE personnage (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    element INT NOT NULL,
    unitclass INT NOT NULL,
    origin INT,
    rarity INT NOT NULL,
    url_img VARCHAR(255)
);
```

### **Table ELEMENT**

```sql
CREATE TABLE element (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    url_img VARCHAR(255) NOT NULL
);
```

### **Table ORIGIN**

```sql
CREATE TABLE origin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    url_img VARCHAR(255) NOT NULL
);
```

### **Table UNITCLASS**

```sql
CREATE TABLE unitclass (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    url_img VARCHAR(255) NOT NULL
);
```

---

## **5. Configuration du projet**

Le fichier de configuration se trouve dans :

```
/Config/Config.php
```

Adapter les informations si besoin :

```php
define("DB_HOST", "localhost");
define("DB_NAME", "genshin_db");
define("DB_USER", "root");
define("DB_PWD", "");
```

---

## **6. Lancer le projet**

Démarrer **Apache + MySQL**, puis ouvrir :

```
http://localhost/Projet/index.php?action=index
```

L’application est maintenant opérationnelle ✔️

---

## **7. Fonctionnalités**

### ✔️ **CRUD Personnage**

* Ajouter un personnage
* Modifier un personnage
* Supprimer un personnage
* Lister tous les personnages

Avec gestion de l’image du personnage.

---

### ✔️ **Gestion des Attributs**

Les attributs sont gérés dans 3 tables différentes :

* **Élément**
* **Origine**
* **UnitClass**

Chaque attribut contient :

* un nom
* une icône (url_img)
* un ID auto-incrémenté

---

### ✔️ **Système de Templates (Plates)**

Toutes les vues utilisent Plates pour un code plus propre et réutilisable.

---

### ✔️ **Authentification (Login / Logout)**

Identifiants par défaut :

```
Email : admin@test.com
Mot de passe : 1234
```

Fonctionnalités :

* Connexion
* Message d’erreur si mauvais identifiants
* Session utilisateur
* Déconnexion via `/projet/?action=logout`

---

### ✔️ **Logs (partie avancée)**

Un système de journalisation est prévu pour créer un fichier log par mois.

---

## **Auteur**

Projet développé par Mme LAKHDAR EZZINE Hadjer dans le cadre du module *Base de Données & Application Web.



