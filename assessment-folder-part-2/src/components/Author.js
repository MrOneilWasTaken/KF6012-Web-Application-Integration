import React from "react";

class Author extends React.Component {
    constructor(props) {
        super(props)
        this.state = { display: false }
    }

    handleClick = () => {
        this.setState({ display: !this.state.display })
    }

    render() {
        let details = ""

        if (this.state.display) {
            details =
                <div>
                    <p>{this.props.abstract}</p>
                </div>
        }

        return (
            <div>
                <h3 onClick={this.handleClick}>{this.props.author.first_name} {this.props.author.last_name}</h3>
                {details}
            </div>
        )
    }
}

export default Author