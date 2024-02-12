document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
    const cartItemsList = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');

    let cart = [];
    let notificationQueue = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    function addToCart(event) {
        const productCard = event.target.closest('.product-card');
        const productName = productCard.dataset.product;
        const productPrice = parseFloat(productCard.dataset.price);
    
        // Añadir producto al carrito
        cart.push({ name: productName, price: productPrice });
    
        // Agregar notificación a la cola
        notificationQueue.push(productName);
    
        // Mostrar las notificaciones de la cola si no hay ninguna mostrándose actualmente
        if (notificationQueue.length === 1) {
            showNextNotification();
        }
    
        // Actualizar la mini sección del carrito
        updateCart();
    }

    function updateCart() {
        // Limpiar la lista de items del carrito
        cartItemsList.innerHTML = '';
    
        // Calcular el total y mostrar los items en el carrito
        let total = 0;
        cart.forEach((item, index) => {
            const listItem = document.createElement('li');
            listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
    
            // Agregar botón de eliminar
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Eliminar';
            deleteButton.classList.add('delete-button');
            deleteButton.addEventListener('click', () => removeFromCart(index)); // Asociar evento para eliminar
            listItem.appendChild(deleteButton);
    
            cartItemsList.appendChild(listItem);
    
            total += item.price;
        });
    
        // Actualizar el total en la sección del carrito
        cartTotal.textContent = total.toFixed(2);
    }

    function removeFromCart(index) {
        cart.splice(index, 1); // Eliminar el elemento del carrito en la posición index
        updateCart(); // Actualizar el carrito después de eliminar
    }
        

    function updateCartWithAnimation(productName) {
        // Crear un elemento div para la animación
        const notification = document.createElement('div');
        notification.classList.add('cart-notification');
        notification.textContent = `${productName} añadido al carrito`;

        // Agregar la notificación a la página
        document.body.appendChild(notification);

        // Eliminar la notificación después de 2 segundos
        setTimeout(() => {
            notification.remove();
        }, 2000);
    }

    function showNextNotification() {
        if (notificationQueue.length > 0) {
            const productName = notificationQueue[0];
    
            // Crear y mostrar la notificación
            const notification = document.createElement('div');
            notification.classList.add('cart-notification');
            notification.textContent = `${productName} añadido al carrito`;
            document.body.appendChild(notification);
    
            // Eliminar la notificación después de un tiempo
            setTimeout(() => {
                notification.remove();
                // Eliminar la notificación actual de la cola
                notificationQueue.shift();
                // Mostrar la siguiente notificación si hay alguna en la cola
                if (notificationQueue.length > 0) {
                    showNextNotification();
                }
            }, 1500);
        }
    }
    
});