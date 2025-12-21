import './Testimonial.css';

export default function Testimonial() {
  return (
    <section className="testimonial-section">
      <div className="testimonial-gradient" />
      <div className="testimonial-skew" />
      <div className="testimonial-container">
        <img
          alt="MissionGranted Logo"
          src="https://tailwindcss.com/plus-assets/img/logos/workcation-logo-indigo-400.svg"
          className="testimonial-logo"
        />
        <figure className="testimonial-figure">
          <blockquote className="testimonial-quote">
            <p>
              "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias
              molestiae. Numquam corrupti in laborum sed rerum et corporis."
            </p>
          </blockquote>
          <figcaption className="testimonial-caption">
            <img
              alt=""
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              className="testimonial-avatar"
            />
            <div className="testimonial-author">
              <div className="testimonial-author-name">Judith Black</div>
              <svg width={3} height={3} viewBox="0 0 2 2" aria-hidden="true" className="testimonial-dot">
                <circle r={1} cx={1} cy={1} />
              </svg>
              <div className="testimonial-author-title">CEO of Workcation</div>
            </div>
          </figcaption>
        </figure>
      </div>
    </section>
  );
}
