import React from "react";
import Author from "./Author";

class Authors extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: []
        }
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/api/authors"

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


        return (
            <div>

            </div>
        )
    }
}

export default Authors