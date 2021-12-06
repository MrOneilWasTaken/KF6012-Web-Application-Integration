import React from "react"
import Actors from "./Actors.js"
import SelectLanguage from "./SelectLanguage.js"
import SearchBox from "./SearchBox.js"

class ActorPage extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            search: ""
        }
    }

    handleSearch = (e) => {
        this.setState({ search: e.target.value })
    }

    render() {
        return (
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch} />
                <Actors search={this.state.search} />
            </div>
        )
    }

}

export default ActorPage;