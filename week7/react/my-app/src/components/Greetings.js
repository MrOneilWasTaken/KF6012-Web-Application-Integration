import React from 'react';
import Hello from './Hello.js';

class Greetings extends React.Component {
  render() {
    const names = this.props.array;
    return (
      <div>
        {names.map((name, i) => (<Hello key={i} name={name} />))}
      </div>

    )
  }
}

export default Greetings;
