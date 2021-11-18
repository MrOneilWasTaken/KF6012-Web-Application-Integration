import React from 'react';
import Goodbye from './Goodbye.js';

class Farewell extends React.Component {
  render() {
    const names = this.props.array;
    return (
      <div>
        {names.map((name, i) => (<Goodbye key={i} name={name} />))}
      </div>
    )
  }
}

export default Farewell;
