import React from "react";
import Actor from './Actor.js';

class Actors extends React.Component {
    constructor(props) {
        super(props)
        this.state = { results: [] }
    }

    componentDidMount() {
        const url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week6/api/actors"

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => {
                this.setState({ results: data.results })
            })
            .catch((err) => {
                console.log("Something went wrong", err)
            });


    }

    filterSearch = (s) => {
        return s.first_name.toLowerCase().includes(this.props.search.toLowerCase())
    }

    render() {
        console.log(this.state.results)
        let noData = "";

        if (this.state.results.length === 0) {
            noData = <p>No data</p>
        }

        let filteredResults = this.state.results

        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = this.state.results.filter(this.filterSearch)
        }

        return (
            <div>
                {noData}
                {filteredResults.map((actor, i) => (<Actor key={i} actor={actor} />))}
                {/* {this.state.results.map((actor, i) => (<Actor key={i} actor={actor} />))} */}
            </div>
        )
    }
}

export default Actors;