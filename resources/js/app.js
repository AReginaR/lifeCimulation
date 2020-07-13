var model = {
    currentCookie: null,
    cookie: [
        {
            clickCount : 0,
            name : 'Cookie',
            imgSrc : 'img/perfectCookie.png',
        },
    ]
};

var octopus = {

    init: function() {
        model.currentCookie = model.cookie[0];

        // tell our views to initialize
        cookieListView.init();
        cookieView.init();
    },

    getCurrentCookie: function() {
        return model.currentCookie;
    },

    getCookies: function() {
        return model.cookie;
    },

    setCurrentCookie: function(cookie) {
        model.currentCookie = cookie;
    },

    incrementCounter: function() {
        model.currentCookie.clickCount++;
        cookieView.render();
    }
};

var cookieView = {

    init: function() {

        this.cookieElem = document.getElementById('cookie');
        this.cookieNameElem = document.getElementById('cookie-name');
        this.cookieImageElem = document.getElementById('cookie-img');
        this.countElem = document.getElementById('cookie-count');

        this.cookieImageElem.addEventListener('click', function(){
            octopus.incrementCounter();
        });

        this.render();
    },

    render: function() {
        var currentCookie = octopus.getCurrentCookie();
        this.countElem.textContent = currentCookie.clickCount;
        this.cookieNameElem.textContent = currentCookie.name;
        this.cookieImageElem.src = currentCookie.imgSrc;
    }
};

var cookieListView = {

    init: function() {
        this.render();
    },

    render: function() {
        var cookie, elem, i;

        var cookies = octopus.getCookies();

        for (i = 0; i < cookies.length; i++) {

            cookie = cookies[i];

            elem = document.createElement('li');
            elem.textContent = cookie.name;

            elem.addEventListener('click', (function(cookieCopy) {
                return function() {
                    octopus.setCurrentCookie(cookieCopy);
                    cookieView.render();
                };
            })(cookie));

        }
    }
};

octopus.init();
