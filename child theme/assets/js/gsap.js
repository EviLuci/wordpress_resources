// Stackable Scroll Animation with GSAP and ScrollTrigger
document.addEventListener("DOMContentLoaded", function (event) {
  console.log("DOM loaded");

  //wait until images, links, fonts, stylesheets, and js is loaded
  window.addEventListener("load", function (e) {
    gsap.registerPlugin(ScrollTrigger);

    // Select the HTML elements needed for the animation
    const scrollSection = document.querySelectorAll(".sticky-parent-container");

    scrollSection.forEach((section) => {
      const items = section.querySelectorAll(".sticky-container");
      initScroll(section, items);
    });

    function initScroll(section, items) {
      // Initial states (vertical)
      items.forEach((item, index) => {
        if (index !== 0) {
          gsap.set(item, { yPercent: 100 });
        }
      });

      const timeline = gsap.timeline({
        scrollTrigger: {
          trigger: section,
          pin: true,
          toggleActions: "play pause resume reverse",
          start: "top top",
          end: () => `+=${items.length * 200}%`,
          scrub: true,
          invalidateOnRefresh: true,
          // markers: true,
        },
        defaults: { ease: "none" },
      });

      items.forEach((currentItem, index) => {
        timeline.to(currentItem, {
          scale: 0.9,
        });

        // Animate next item into view (vertical)
        let nextItem = items[index + 1];
        if (nextItem) {
          timeline.to(
            nextItem,
            {
              yPercent: 0,
            },
            "<"
          );
        }
      });
    }

    // Assuming the element has class 'hover-transition'
    const el = document.querySelector(".hover-transition");

    el.addEventListener("mouseenter", () => {
      gsap.to(el, {
        custom: 270,
        duration: 0.5,
        ease: "power2.out",
        onUpdate: function () {
          const angle = this.targets()[0].custom;
          el.style.background = `linear-gradient(${angle}deg, #007ED4, #003255)`;
        },
      });
    });

    el.addEventListener("mouseleave", () => {
      gsap.to(el, {
        custom: 90,
        duration: 0.5,
        ease: "power2.out",
        onUpdate: function () {
          const angle = this.targets()[0].custom;
          el.style.background = `linear-gradient(${angle}deg, #007ED4, #003255)`;
        },
      });
    });
  });
});
