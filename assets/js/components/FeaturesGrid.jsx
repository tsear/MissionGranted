import { ArrowPathIcon, CloudArrowUpIcon, FingerPrintIcon, LockClosedIcon } from '@heroicons/react/24/outline';
import './FeaturesGrid.css';

const features = [
  {
    name: 'Push to deploy',
    description: 'Morbi viverra dui mi arcu sed. Tellus semper adipiscing suspendisse semper morbi. Odio urna massa nunc massa.',
    icon: CloudArrowUpIcon,
  },
  {
    name: 'SSL certificates',
    description: 'Sit quis amet rutrum tellus ullamcorper ultricies libero dolor eget. Sem sodales gravida quam turpis enim lacus amet.',
    icon: LockClosedIcon,
  },
  {
    name: 'Simple queues',
    description: 'Quisque est vel vulputate cursus. Risus proin diam nunc commodo. Lobortis auctor congue commodo diam neque.',
    icon: ArrowPathIcon,
  },
  {
    name: 'Advanced security',
    description: 'Arcu egestas dolor vel iaculis in ipsum mauris. Tincidunt mattis aliquet hac quis. Id hac maecenas ac donec pharetra eget.',
    icon: FingerPrintIcon,
  },
];

export default function FeaturesGrid() {
  return (
    <div className="features-grid-react">
      <div className="features-grid-react__container">
        <div className="features-grid-react__header">
          <h2 className="features-grid-react__subtitle">Deploy faster</h2>
          <p className="features-grid-react__title">
            Everything you need to deploy your app
          </p>
          <p className="features-grid-react__description">
            Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum
            pulvinar et feugiat blandit at. In mi viverra elit nunc.
          </p>
        </div>
        <div className="features-grid-react__grid">
          {features.map((feature) => (
            <div key={feature.name} className="features-grid-react__item">
              <div className="features-grid-react__item-content">
                <div className="features-grid-react__icon-wrapper">
                  <feature.icon aria-hidden="true" className="features-grid-react__icon" />
                </div>
                <h3 className="features-grid-react__item-title">{feature.name}</h3>
              </div>
              <p className="features-grid-react__item-description">{feature.description}</p>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
