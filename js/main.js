$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
});

$("#find-btn").click(function(){
    var cities = ["City Selfie Tour","Brusov Cruise", "Moscow Tour", "Gaudi’s City", "Venice Canals", "Fun in Prague"]
    var destCity = $("#destination").val();
    var n = Math.floor(Math.random() * 10);
    if (n > 5){
        n-=5;
    }
    if(destCity == null){
        alert("select a destination");
    }
    else{
        $("#dest-img").attr("src", `./images/place-${n}.jpg`);
        $("#find-city").html(cities[n]);
        $("#dest-city").html(`( ${destCity} )`);
        $(".find-sec").slideDown();
    }
});