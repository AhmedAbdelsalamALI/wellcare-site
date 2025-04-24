// استدعاء العناصر
const modal = document.getElementById('videoModal');
const modalVideo = document.getElementById('modal-video');
const videoSource = document.getElementById('video-source');
const closeBtn = document.querySelector('.close-btn');
const videoCards1 = document.querySelectorAll('.video-card1');
const videoCards2 = document.querySelectorAll('.video-card2');
const videoCards3 = document.querySelectorAll('.video-card3');
const videoCards4 = document.querySelectorAll('.video-card4');
const videoCards5 = document.querySelectorAll('.video-card5');
const videoCards6 = document.querySelectorAll('.video-card6');

// فتح المودال عند النقر على بطاقة فيديو
videoCards1.forEach(card => {
    card.addEventListener('click', () => {
        const videoSrc = "how-we-hear.mp4"; // مسار الفيديو المحلي
        modal.classList.add('show'); // إظهار المودال
        videoSource.src = videoSrc;
        modalVideo.load(); // تحميل الفيديو
        modalVideo.play(); // تشغيل الفيديو
    });
});

videoCards2.forEach(card => {
    card.addEventListener('click', () => {
        const videoSrc = "videos/video2.mp4"; // مسار الفيديو المحلي
        modal.classList.add('show');
        videoSource.src = videoSrc;
        modalVideo.load();
        modalVideo.play();
    });
});

videoCards3.forEach(card => {
    card.addEventListener('click', () => {
        const videoSrc = "videos/video3.mp4"; // مسار الفيديو المحلي
        modal.classList.add('show');
        videoSource.src = videoSrc;
        modalVideo.load();
        modalVideo.play();
    });
});

videoCards4.forEach(card => {
    card.addEventListener('click', () => {
        const videoSrc = "videos/video4.mp4"; // مسار الفيديو المحلي
        modal.classList.add('show');
        videoSource.src = videoSrc;
        modalVideo.load();
        modalVideo.play();
    });
});

videoCards5.forEach(card => {
    card.addEventListener('click', () => {
        const videoSrc = "videos/video5.mp4"; // مسار الفيديو المحلي
        modal.classList.add('show');
        videoSource.src = videoSrc;
        modalVideo.load();
        modalVideo.play();
    });
});

videoCards6.forEach(card => {
    card.addEventListener('click', () => {
        const videoSrc = "videos/video6.mp4"; // مسار الفيديو المحلي
        modal.classList.add('show');
        videoSource.src = videoSrc;
        modalVideo.load();
        modalVideo.play();
    });
});

// إغلاق المودال عند النقر على زر الإغلاق
closeBtn.addEventListener('click', () => {
    modal.classList.remove('show'); // إخفاء المودال
    modalVideo.pause(); // إيقاف الفيديو عند إغلاق المودال
    modalVideo.currentTime = 0; // إعادة الفيديو للبداية
});

// إغلاق المودال عند النقر خارج المودال
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('show'); // إخفاء المودال
        modalVideo.pause(); // إيقاف الفيديو
        modalVideo.currentTime = 0; // إعادة الفيديو للبداية
    }
});
