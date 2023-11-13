<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product Page</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }
    header {
        background: #50b3a2;
        color: white;
        padding-top: 30px;
        min-height: 70px;
        border-bottom: #e8491d 3px solid;
    }
    header a {
        color: #ffffff;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 16px;
    }
    header ul {
        padding: 0;
        list-style: none;
    }
    header ul li {
        float: left;
        display: inline;
        padding: 0 20px 0 20px;
    }
    header #branding {
        float: left;
    }
    header #branding h1 {
        margin: 0;
    }
    header nav {
        float: right;
        margin-top: 10px;
    }
    header .highlight, header .current a {
        color: #e8491d;
        font-weight: bold;
    }
    header a:hover {
        color: #ffffff;
        font-weight: bold;
    }
    .add-product {
        background: #ffffff;
        padding: 15px;
        margin-top: 15px;
        border: 1px solid #cccccc;
    }
    .add-product input[type="text"],
    .add-product input[type="number"],
    .add-product select,
    .add-product textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #cccccc;
    }
    .add-product input[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background: #50b3a2;
        color: white;
        border: 0;
        cursor: pointer;
    }
    .add-product input[type="submit"]:hover {
        background: #45a092;
        transition: background 0.3s ease;
    }
</style>
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">My</span> Catalogue</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="current"><a href="products.html">Products</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <section class="add-product">
        <h2>Add Product</h2>
        <form>
            <div>
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="electronics">Electronics</option>
                    <option value="books">Books</option>
                    <option value="clothing">Clothing</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" min="0" step="0.01">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <!-- Add more fields as necessary -->
            <input type="submit" value="Add Product">
        </form>
    </section>
</div>
</body>
</html>
