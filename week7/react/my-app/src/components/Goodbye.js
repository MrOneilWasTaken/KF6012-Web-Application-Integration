import React from 'react';

class Goodbye extends React.Component {
  render() {
    const name = this.props.name;
    return (
      <p>Goodbye, {name}</p>
    )
  }
}


export default Goodbye;
