import React from "react";

class Film extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            display: false
        }
    }

    handleClick = () => {
        this.setState({ display: !this.state.display })
    }

    render() {

        let details = "";

        if (this.state.display) {
            details = <div>
                <p>{this.props.film.description}</p>
                <p>{this.props.film.language}</p>
                <p>{this.props.film.category}</p>
            </div>
        }

        return (
            <div onClick={this.handleClick}>
                <p>{this.props.film.title}</p>
                {details}
            </div>
        )
    }
}

export default Film;