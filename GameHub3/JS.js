let userRating = 0;
let totalRatings = 0;
let averageRating = 0;

function rateGame(rating) {
  userRating = rating;
  totalRatings++;
  averageRating = (averageRating * (totalRatings - 1) + userRating) / totalRatings;
  displayRating();
}

function displayRating() {
  const stars = document.querySelectorAll('.star');
  stars.forEach((star, index) => {
    if (index < userRating) {
      star.classList.add('selected');
    } else {
      star.classList.remove('selected');
    }
  });
  document.getElementById('user-rating').textContent = `Tu puntuación: ${userRating} estrella(s)`;
  document.getElementById('average-rating').textContent = `Valoración promedio: ${averageRating.toFixed(2)}`;
}
    