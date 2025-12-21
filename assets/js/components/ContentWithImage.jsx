import { CloudArrowUpIcon, LockClosedIcon, ServerIcon } from '@heroicons/react/20/solid';
import './ContentWithImage.css';

export default function ContentWithImage() {
  return (
    <div className="content-with-image">
      <div className="content-with-image__grid">
        <div className="content-with-image__content">
          <div className="content-with-image__content-inner">
            <p className="content-with-image__subtitle">Deploy faster</p>
            <h1 className="content-with-image__title">
              A better workflow
            </h1>
            <p className="content-with-image__description">
              Aliquet nec orci mattis amet quisque ullamcorper neque, nibh sem. At arcu, sit dui mi, nibh dui, diam
              eget aliquam. Quisque id at vitae feugiat egestas.
            </p>
            <div className="content-with-image__body">
              <p>
                Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet
                vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque
                erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris
                semper sed amet vitae sed turpis id.
              </p>
              <ul role="list" className="content-with-image__list">
                <li className="content-with-image__list-item">
                  <CloudArrowUpIcon aria-hidden="true" className="content-with-image__icon" />
                  <span>
                    <strong className="content-with-image__strong">Push to deploy.</strong> Lorem ipsum, dolor sit amet
                    consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate
                    blanditiis ratione.
                  </span>
                </li>
                <li className="content-with-image__list-item">
                  <LockClosedIcon aria-hidden="true" className="content-with-image__icon" />
                  <span>
                    <strong className="content-with-image__strong">SSL certificates.</strong> Anim aute id magna aliqua ad
                    ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.
                  </span>
                </li>
                <li className="content-with-image__list-item">
                  <ServerIcon aria-hidden="true" className="content-with-image__icon" />
                  <span>
                    <strong className="content-with-image__strong">Database backups.</strong> Ac tincidunt sapien vehicula
                    erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                  </span>
                </li>
              </ul>
              <p className="content-with-image__paragraph">
                Et vitae blandit facilisi magna lacus commodo. Vitae sapien duis odio id et. Id blandit molestie auctor
                fermentum dignissim. Lacus diam tincidunt ac cursus in vel. Mauris varius vulputate et ultrices hac
                adipiscing egestas. Iaculis convallis ac tempor et ut. Ac lorem vel integer orci.
              </p>
              <h2 className="content-with-image__subheading">No server? No problem.</h2>
              <p className="content-with-image__paragraph-last">
                Id orci tellus laoreet id ac. Dolor, aenean leo, ac etiam consequat in. Convallis arcu ipsum urna nibh.
              Pharetra, euismod vitae interdum mauris enim, consequat vulputate nibh. Maecenas pellentesque id sed
              tellus mauris, ultrices mauris. Tincidunt enim cursus ridiculus mi. Pellentesque nam sed nullam sed diam
              turpis ipsum eu a sed convallis diam.
            </p>
            </div>
          </div>
        </div>
        <video
          autoPlay
          loop
          muted
          playsInline
          className="content-with-image__screenshot"
        >
          <source src={`${window.missionGrantedData?.themeUrl || ''}/assets/videos/Automation Over Spreadsheets.webm`} type="video/webm" />
        </video>
      </div>
    </div>
  );
}