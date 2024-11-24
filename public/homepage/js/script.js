// var getCols = document.querySelectorAll("#circle1"); // Chọn tất cả các phần tử có id "circle1"
//     var i = 0;

//     // Khi rê chuột vào
//     getCols.forEach((col) => {
//         col.addEventListener("mouseover", () => {
//             var interval = setInterval(() => {
//                 col.style.background = "conic-gradient(#14a4f2 0deg, #14a4f2 " + i + "deg, #8fcff2 " + i + "deg, #8fcff2)";
//                 i++;
//                 if (i == 360) {
//                     i = 0;
//                 }
//             }, 1);

//             // Khi rê chuột ra, dừng hiệu ứng
//             col.addEventListener("mouseout", () => {
//                 clearInterval(interval);
//                 col.style.background = ""; // Reset màu nền khi chuột rời khỏi
//             });
//         });
//     });



// var getCols = document.querySelectorAll("#circle1"); // Chọn tất cả các phần tử có id "circle1"
//     var i = 0;

//     // Khi rê chuột vào
//     getCols.forEach((col) => {
//         col.addEventListener("mouseover", () => {
//             function updateEffect() {
//                 col.style.background = "conic-gradient(#14a4f2 0deg, #14a4f2 " + i + "deg, #8fcff2 " + i + "deg, #8fcff2)";
//                 i++;
//                 if (i === 360) {
//                     return; // Dừng khi vòng quay hoàn thành
//                 }

//                 // Gọi lại updateEffect để tạo ra hiệu ứng động một lần duy nhất
//                 requestAnimationFrame(updateEffect);
//             }

//             // Bắt đầu hiệu ứng khi rê chuột vào
//             updateEffect();

//             // Khi rê chuột ra, reset lại
//             col.addEventListener("mouseout", () => {
//                 col.style.background = ""; // Reset màu nền khi chuột rời khỏi
//                 i = 0; // Đặt lại góc quay về 0 nếu muốn khi chuột ra
//             });
//         });
//     });


const circles = document.querySelectorAll("#circle1");

circles.forEach((circle) => {
    let isAnimating = false;
    let animationId = null;
    let degree = 0;

    function updateEffect() {
        if (!isAnimating) return;

        circle.style.background = `conic-gradient(#14a4f2 0deg, #14a4f2 ${degree}deg, #8fcff2 ${degree}deg, #8fcff2)`;
        // Tăng bước nhảy lên 18 độ
        degree += 18; 

        if (degree <= 360) {
            animationId = requestAnimationFrame(updateEffect);
        } else {
            isAnimating = false;
            // Khi hoàn thành animation
            circle.style.background = `conic-gradient(#14a4f2 0deg, #14a4f2 360deg, #adddf6 360deg, #adddf6)`;
        }
    }

    circle.addEventListener("mouseover", () => {
        if (degree < 360 && !isAnimating) {
            isAnimating = true;
            updateEffect();
        }
    });

    circle.addEventListener("mouseout", () => {
        isAnimating = false;
        if (animationId) {
            cancelAnimationFrame(animationId);
        }
        // Reset lại màu nền ban đầu và degree khi rê chuột ra
        circle.style.background = "#adddf6";  // hoặc màu nền ban đầu của bạn
        degree = 0;
    });
});