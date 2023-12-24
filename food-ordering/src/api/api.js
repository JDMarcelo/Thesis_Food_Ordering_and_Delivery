import axios from "axios";
export const fetchPizza = async () => {
  try {
    const response = await axios.get("https://fakestoreapi.com/products");
    return response.data;

    // Do something with the response, e.g., log the data
    // console.log(response.data);
  } catch (error) {
    // Handle errors, e.g., log the error
    console.error("Error fetching pizza:", error);
  }
};
