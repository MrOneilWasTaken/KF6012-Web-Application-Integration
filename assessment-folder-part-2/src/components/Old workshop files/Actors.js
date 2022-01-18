import React from "react";
import Actor from "./Actor.js";

class Actors extends React.Component {
    constructor(props) {
        super(props)
        this.state = { results: [] }
        console.log("constructor")
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week6/api/actors"

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
                //console.log(this.state.results)
            })
            .catch((err) => {
                console.log("something went wrong ", err)
            });
    }



    //Boolean you fucking idiot
    filterSearch = (s) => {
        return `${s.first_name} ${s.last_name}`.toLowerCase().includes(this.props.search.toLowerCase())
    }


    // filterSearch = (s) => {
    //     let flag = false
    //     //console.log(this.props.search.toLowerCase().split(" "))
    //     this.props.search.toLowerCase().split(" ").forEach(e => {
    //         if (s.first_name.toLowerCase().includes(e) || s.last_name.toLowerCase().includes(e)) {
    //             flag = true
    //         }
    //     })
    //     return flag
    // }
    // filterSearch = (s) => {
    //     let firstAndLast = this.props.search.split(" ")
    //     return (firstAndLast)
    // }
    // filterSearch = (s) => {
    //     return (s.first_name.toLowerCase().includes(this.props.search.toLowerCase()) || s.last_name.toLowerCase().includes(this.props.search.toLowerCase()))
    // }

    render() {
        console.log("render")
        console.log(this.state.results)

        let filteredResults = this.state.results

        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = filteredResults.filter(this.filterSearch)
        }

        console.log(filteredResults);

        return (
            <div>
                {/* {this.state.results.map((actor, i) => (<Actor key={i} actor={actor} />))} */}
                {filteredResults.map((actor, i) => (<Actor key={actor.first_name + actor.last_name + i} actor={actor} />))}
            </div>
        )
    }
}

export default Actors;