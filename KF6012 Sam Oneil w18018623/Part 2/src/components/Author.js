import React from "react";
import Paper from "./Paper";

/**
 * Author Component
 * 
 * This component formats the data that an individual result from the Authors component would get
 *  
 * @author Sam Oneil w18018623
 *  
 */

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
                    <h4>Papers</h4>
                    {this.props.author.papers.map((paper, i) => (<Paper key={i} paper={paper} />))}
                </div>
        }

        return (
            <div class="card" >
                <h3 onClick={this.handleClick}>
                    {this.props.author.first_name} {this.props.author.middle_name} {this.props.author.last_name}
                </h3>
                {details}
            </div>
        )
    }
}

export default Author