import React from "react";

// <PaperAuthor paperid={this.props.paper.paperid}
// this.props.paperid

class PaperAuthor extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: [],
            result: []
        }
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/api/authors"


        url += "?paperid=" + this.props.paperid

        console.log("paper ID IS")
        console.log(this.props.paperid)

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
            .catch((err) => { console.log("Something went wrong m8", err) })

        this.setState({ result: this.state.results[0] })
    }

    render() {

        console.log("This is refined results")
        console.log(this.state.result)


        return (
            <div>
                {/* {this.state.results.map((result, i) => (
                    <p key={i}>{result[i].authors}</p>))} */}
                {/* {this.state.result.authors.map((author, i) => (<p>{author.first_name}</p>))} */}
            </div>
        )
    }

}
export default PaperAuthor