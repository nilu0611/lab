import React from 'react';
import MapComponent from './MapComponent';

const worldMarkers = [
  { position: [51.505, -0.09], info: 'London, UK' },
  { position: [40.7128, -74.006], info: 'New York, USA' },
  // Add more markers for the world map
];

const indiaMarkers = [
  { position: [28.6139, 77.209], info: 'New Delhi, India' },
  { position: [19.076, 72.8777], info: 'Mumbai, India' },
  // Add more markers for India map
];

const InformativePage = () => {
  return (
    <div>
      <h1>World Map</h1>
      <MapComponent center={[20, 0]} zoom={2} markers={worldMarkers} />

      <h1>India Map</h1>
      <MapComponent center={[20.5937, 78.9629]} zoom={5} markers={indiaMarkers} />
    </div>
  );
};

export default InformativePage;
