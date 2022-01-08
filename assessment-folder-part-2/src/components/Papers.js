import React from "react";
import Paper from "./Paper";

class Papers extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: []
        }

        console.log("Mounted")
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/api/papers"

        //can filter by ID here now

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => { this.setState({ results: data.results }) })
            .catch((err) => { console.log("Something went wrong m8", err) });
    }

    render() {

        let noData = ""

        console.log("Render")
        console.log(this.state.results)

        return (
            <div>
                {this.state.results.map((paper, i) => (<Paper key={paper.title} paper={paper} />))}
            </div>
        )
    }
}

export default Papers