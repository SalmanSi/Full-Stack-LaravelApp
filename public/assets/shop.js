// References to the buttons and the dynamic product list container
const addItemForm = document.getElementById("item-form");
const removeItemBtn = document.getElementById("remove-item-btn");
const dynamicProductList = document.querySelector(".product-list");

// Popup elements
const openFormBtn = document.getElementById("open-form-btn");
const closePopupBtn = document.getElementById("close-popup-btn");
const itemPopup = document.getElementById("item-popup");

// Function to create a product item dynamically
function createProductItem(title, price, imageURL, productId) {
    const productDiv = document.createElement("div");
    productDiv.classList.add("product");

    const productImg = document.createElement("img");
    productImg.src = imageURL;
    productImg.alt = title;

    const productName = document.createElement("h3");
    productName.textContent = title;

    const productPrice = document.createElement("p");
    productPrice.textContent = `Price: $${price}`;

    const productQuantityLabel = document.createElement("label");
    productQuantityLabel.setAttribute("for", `quantity${productId}`);
    productQuantityLabel.textContent = "Quantity:";

    const productQuantityInput = document.createElement("input");
    productQuantityInput.type = "number";
    productQuantityInput.min = "1";
    productQuantityInput.value = "1";
    productQuantityInput.id = `quantity${productId}`;

    const addToCartBtn = document.createElement("button");
    addToCartBtn.textContent = "Add to Cart";
    addToCartBtn.classList.add("add-to-cart"); // Add class for styling
    addToCartBtn.setAttribute("data-product-id", productId); // Add the product ID to the button

    // Append all elements to the product div
    productDiv.appendChild(productImg);
    productDiv.appendChild(productName);
    productDiv.appendChild(productPrice);
    productDiv.appendChild(productQuantityLabel);
    productDiv.appendChild(productQuantityInput);
    productDiv.appendChild(addToCartBtn);

    return productDiv;
}

function closePopup() {
    const itemPopup = document.getElementById("item-popup"); // Ensure correct reference
    if (itemPopup) {
        itemPopup.style.display = "none"; // Hide the popup
    } else {
        console.error("Popup element not found.");
    }
}



// Handle form submission to add new item
addItemForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(addItemForm); // Automatically includes file input

    fetch("/products", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert(data.message);

                // Add product to the UI
                const productItem = createProductItem(
                    data.product.name,
                    data.product.price,
                    `/storage/${data.product.image}`,
                    data.product.id
                );

                dynamicProductList.appendChild(productItem);

                // Clear the form and close the popup
                addItemForm.reset();
                closePopup();
            } else {
                alert("Failed to add product.");
            }
        })
        .catch((error) => console.error("Error adding product:", error));
});





// Function to remove the last added product
removeItemBtn.addEventListener("click", () => {
    const lastProduct = dynamicProductList.lastElementChild;
    if (lastProduct) {
        dynamicProductList.removeChild(lastProduct);
    } else {
        alert("No items to remove.");
    }
});

// Function to open the popup
openFormBtn.addEventListener("click", () => {
    itemPopup.style.display = "flex"; // Show the popup
});

// Function to close the popup
closePopupBtn.addEventListener("click", () => {
    itemPopup.style.display = "none"; // Hide the popup
});

// Function to handle color changes
function changeBodyColor(event) {
    document.body.style.backgroundColor = event.target.value;
}

function changeNavColor(event) {
    const header = document.querySelector("header"); // Correctly select the header
    header.style.backgroundColor = event.target.value;
}

// Adding event listener to dynamically created add-to-cart buttons
document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart");

    addToCartButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const productId = this.getAttribute("data-product-id");
            const quantity = document.getElementById(
                `quantity${productId}`
            ).value;

            // Basic alert for now - you can expand this later
            alert(`Added Product ${productId} to cart - Quantity: ${quantity}`);

            // You'll want to implement a more robust cart system later
            // This might involve AJAX to send data to a cart controller

            // Example of AJAX (uncomment below to use):
            
            fetch('/add-to-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product added to cart!');
                } else {
                    alert('Failed to add product to cart');
                }
            })
            .catch(error => console.error('Error:', error));
            
        });
    });
});
