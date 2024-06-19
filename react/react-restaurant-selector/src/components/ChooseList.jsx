import React from 'react';

const ChoiceList = ({ chooses }) => (
  <div>
    {chooses.map((choose, index) => (
      <p key={index}>
        {choose.date} - {choose.restaurant}
      </p>
    ))}
  </div>
);

export default ChoiceList;